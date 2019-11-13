from flask import Flask, request, jsonify
from flask_pymongo import PyMongo
from pymongo import ReturnDocument

app = Flask(__name__)

app.config['MONGO_URI'] = 'mongodb+srv://mansoor:mansoor11@flask-app-yd5cz.mongodb.net/test?retryWrites=true&w=majority'


mongo = PyMongo(app)

@app.route('/')
def index():
    usersData = mongo.db.usersData
    data = []
    result = usersData.find({"userName": "ali"},{"_id": 0, "password": 0}).limit(2)
    for i in result:
        data.append(i)
    return jsonify({"data": data})

@app.route('/sort')
def index1():
    usersData = mongo.db.usersData
    data = []
    result = usersData.find({},{"_id": 0, "password": 0}).sort("userName", -1)
    for i in result:
        data.append(i)
    return jsonify({"data": data})

@app.route('/updateName', methods=["POST"])
def updateName():
    data = request.json
    usersData = mongo.db.usersData
    print(data)
    result = usersData.find_one_and_update({"email": data['email']},{"$set": {"userName": data['userName']}},return_document=ReturnDocument.AFTER)
    print(result)
    return "Done" 

@app.route('/deleteName', methods=["POST"])
def deleteName():
    data = request.json
    usersData = mongo.db.usersData
    result = usersData.find_one_and_delete({"email": data['email']})
    print(result)
    return "Done"

app.run(debug=True)