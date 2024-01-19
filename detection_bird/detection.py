from flask import Flask,render_template, Response
import numpy as np
import cv2
import urllib.request

app=Flask(__name__)
camera=cv2.VideoCapture(0) # 0 / url

whT=320
confThreshold = 0.5
nmsThreshold = 0.3
classesfile='coco.names'
classNames=[]
with open(classesfile,'rt') as f:
    classNames=f.read().rstrip('\n').split('\n')
#print(classNames)

modelConfig = 'yolov3.cfg'
modelWeights= 'yolov3.weights'
net = cv2.dnn.readNetFromDarknet(modelConfig,modelWeights)
net.setPreferableBackend(cv2.dnn.DNN_BACKEND_OPENCV)
net.setPreferableTarget(cv2.dnn.DNN_TARGET_CPU)

def findObject(outputs,im):
    hT,wT,cT = im.shape
    bbox = []
    classIds = []
    confs = []
    found_cat = False
    found_bird = False
    for output in outputs:
        for det in output:
            scores = det[5:]
            classId = np.argmax(scores)
            confidence = scores[classId]
            if confidence > confThreshold:
                w,h = int(det[2]*wT), int(det[3]*hT)
                x,y = int((det[0]*wT)-w/2), int((det[1]*hT)-h/2)
                bbox.append([x,y,w,h])
                classIds.append(classId)
                confs.append(float(confidence))
    #print(len(bbox))
    indices = cv2.dnn.NMSBoxes(bbox,confs,confThreshold,nmsThreshold)
    print(indices)
    for i in indices:
        box = bbox[i]
        x,y,w,h = box[0],box[1],box[2],box[3]
        if classNames[classIds[i]] == 'bird':
            found_bird = True
            
            cv2.rectangle(im,(x,y),(x+w,y+h),(255,0,255),2)
            cv2.putText(im, f'{classNames[classIds[i]].upper()} {int(confs[i]*100)}%', (x,y-10), cv2.FONT_HERSHEY_SIMPLEX, 0.6, (255,0,255), 2)
            
            print('bird found!!')
            # URL endpoint API lokal
            api_url = 'http://192.168.1.13:8000/send-data-bird/camera'

            res = urllib.request.urlopen(api_url)
            resJson = res.read()

        

            

def generate_frames():
    while True:

        success,im=camera.read()
        if not success:
            break
        else:
            blob=cv2.dnn.blobFromImage(im,1/255,(whT,whT),[0,0,0],1,crop=False) # frame / im
            net.setInput(blob)
            layernames=net.getLayerNames()

            outputNames = [layernames[i-1] for i in net.getUnconnectedOutLayers()]

            outputs = net.forward(outputNames)
            findObject(outputs,im)
            ret,buffer=cv2.imencode('.jpg',im) # im / frame
            im=buffer.tobytes() # im / frame

        yield(b'--frame\r\n'b'Content-Type: image/jpeg\r\n\r\n' + im + b'\r\n') # im / frame


@app.route('/')
def index():
    return render_template('index.html')

@app.route('/video')
def video():
    return Response(generate_frames(),mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__=="__main__":
    app.run(debug=True)