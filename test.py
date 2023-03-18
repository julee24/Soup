
from flask import Flask, render_template, Response
import cv2
import torch
import numpy as np
import sys
from time import time
import imutils
import simplejpeg
import logging
import yolov5.detect as detect
from flask_mysqldb import MySQL
import threading

app = Flask(__name__)
#model = torch.hub.load('ultralytics/yolov5')
# hand =0
# book =0
# phone = 0
# paper=0
# pad=0
# nothing = 0
tem_message = "temporary"
final_message = "prediction result"


# app.config['MYSQL_HOST'] = 'localhost'
# app.config['MYSQL_USER'] = 'root'
# app.config['MYSQL_PASSWORD'] = 'yewwey1105'
# app.config['MYSQL_DB'] = 'newdb'

mysql = MySQL(app)

@app.route("/")
def start():
     return "Hello World!"





def gen():
    global tem_message
    while True:
            generator = detect.run(source=0, weights='C:\\APM\\Apache24\\htdocs\\Soup\\best.pt')
            for results, frame in generator:
                tem_message=results
                ret, buffer = cv2.imencode('.jpg', frame)
                #frame=simplejpeg.encode_jpeg(frame) -> 파란색돼...?
                frame = buffer.tobytes()
                #print(nothing)
                #app.logger.info('results:', results)
                yield (b'--frame\r\n'
                    b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')
    #cursor.close()


# 이거 떄문인가
@app.route("/video_feed")
def video_feed():
    # return Response(detection['video'], mimetype='multipart/x-mixed-replace; boundary=frame')
    return Response(gen(), mimetype='multipart/x-mixed-replace; boundary=frame')

# @app.route("/video_end")
# def video_end():
#      cv2.destroyAllWindows()
#      raise StopIteration

# try:
#     app.run(host='0.0.0.0', port=8889)
# except:
#     print('unable to open port') 

@app.route("/sendResult")
def sendResult():
    global tem_message, final_message

    if tem_message == "temporary":
        final_message = "no prediction yet"

    else:
        final_message = tem_message

    return final_message


# 이거때문인가
if __name__ == '__main__': 
    app.run() 



# #일단
# # def gen(camera):
# #     while True:
# #         # player, x_shape, y_shape, four_cc  = camera.get_frame()
# #         # #print(frame)
# #         # start_time = time() # We would like to measure the FPS.
# #         # ret, frame = player.read() 
# #         # assert ret
# #         # results = camera.score_frame(frame) # Score the Frame
# #         # print(results)
# #         # frame = camera.plot_boxes(results, frame) # Plot the boxes.
# #         # print(frame)
# #         # end_time = time()
# #         # fps = 1/np.round(end_time - start_time, 3) #Measure the FPS.
# #         # print(f"Frames Per Second : {fps}")
    
# #         # #ret, buffer = cv2.imencode('.jpg', frame)
# #         # #frame = buffer.tobytes()
# #         # yield (b'--frame\r\n'
# #         #        b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n\r\n')
# #         #Write the frame onto the output.
# #         frame = camera.get_frame()
# #         yield (b'--frame\r\n'
# #                b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n\r\n')

# # def cat(camera):
# #     flamingo = camera.print_classes()
# #     print(flamingo)
# # def cam() :
# #     detect.run(source=0, weights='best.pt')

#do this to run detect.py
# @app.route('/output')
# def output():
#     global hand
#     return Response(hand, mimetype='text/html')

# #일단
# def gen(frames):
#     consol.log(frames)
#     yield (b'--frame\r\n' 
#            b'Content-Type: image/jpeg\r\n\r\n' + frames + b'\r\n\r\n')

# gen(detect.run(source=0, weights='best.pt'))

# #일단
# # @app.route('/video_feed')
# # def video_feed():
# #     # return Response(detect.run(source=0, weights='best.pt'), mimetype='multipart/x-mixed-replace; boundary=frame')
# #     return Response(gen(detect.run(source=0, weights='best.pt')), mimetype='multipart/x-mixed-replace; boundary=frame') 

# # @app.route('/video_feed')
# # def video_feed():
# #     return Response(detect.detect(), mimetype='multipart/x-mixed-replace; boundary=frame')

# # @app.route('/output')
# # def output():
# #     return Response(detect.out(), mimetype='text/html')

# # do this to run camera.py
# # @app.route('/video_feed')
# # def video_feed():
# #     # cat(VideoCamera())
# #     return Response(gen(VideoCamera()),
# #                     mimetype='multipart/x-mixed-replace; boundary=frame')

# # # app.run(host="0.0.0.0", port=80)

# if __name__ == '__main__':
#     app.run(host='0.0.0.0', debug=False)