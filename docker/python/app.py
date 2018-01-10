'''from flask import Flask
from redis import Redis
app = Flask(__name__)
redis = Redis(host='redis', port=6379)
@app.route('/')
def hello():
count = redis.incr('hits')
return 'Hello World! 该页面已被访问 {} 次。\n'.format(count)
if __name__ == "__main__":
app.run(host="0.0.0.0", debug=True)'''


from flask import Flask
from redis import Redis
redis = Redis(host='redis', port=6379)
app = Flask(__name__)
@app.route('/')
def hello():
    count = redis.incr('hits')
    return 'Hello World! 该页面已被访问 {} xx次。\n'.format(count)
    #return 'Hello World! 该页面已被访问 s2 次。\n'
if __name__ == "__main__":
    app.run(host="0.0.0.0", debug=True)
