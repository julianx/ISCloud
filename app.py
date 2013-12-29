#!flask/bin/python
# -*- coding: iso-8859-1 -*-
from flask import Flask, jsonify, abort, request, make_response, url_for
from flask.ext.httpauth import HTTPBasicAuth
 
app = Flask(__name__, static_url_path = "")
auth = HTTPBasicAuth()
 
@auth.get_password
def get_password(username):
    if username == 'miguel':
        return 'python'
    return None
 
@auth.error_handler
def unauthorized():
    return make_response(jsonify( { 'error': 'Unauthorized access' } ), 403)
    # return 403 instead of 401 to prevent browsers from displaying the default auth dialog
    
@app.errorhandler(400)
def not_found(error):
    return make_response(jsonify( { 'error': 'Bad request' } ), 400)
 
@app.errorhandler(404)
def not_found(error):
    return make_response(jsonify( { 'error': 'Not found' } ), 404)
 
tasks = [
    {
    	'id': 1,
        'plazo': 1,
        'titulo': u'Buy groceries',
        'descripcion': u'Milk, Cheese, Pizza, Fruit, Tylenol', 
        'usuario': u'administrador',
        'password': u'agasajadasdanadas',
        'accesoDirecto': u'mstsc /v 157.253.1.2',
        'activo': True, 
        'inactivo': False,
        'pausado': False
    },
    {
    	'id': 2,
        'plazo': 4,
        'titulo': u'Learn Python',
        'descripcion': u'Need to find a good Python tutorial on the web', 
        'usuario': u'administrador',
        'password': u'agasajadasdanadas',
        'accesoDirecto': u'mstsc /v 157.253.1.2',
        'activo': False,
        'inactivo': True,
        'pausado': False
    },
    {
    	'id': 3,
        'plazo': 6,
        'titulo': u'Learn AJAX',
        'descripcion': u'Need to find a good FLASK tutorial on the web', 
        'usuario': u'administrador',
        'password': u'agasajadasdañadas',
        'accesoDirecto': u'mstsc /v 157.253.1.3',
        'activo': False,
        'inactivo': False,
        'pausado': True
    }
]
 



def make_public_task(task):
    new_task = {}
    for field in task:
        if field == 'id':
            new_task['uri'] = url_for('get_task', task_id = task['id'], _external = True)
        else:
            new_task[field] = task[field]
    return new_task
    
@app.route('/todo/api/v1.0/tasks', methods = ['GET'])
@auth.login_required
def get_tasks():
    return jsonify( { 'tasks': map(make_public_task, tasks) } )
 
@app.route('/todo/api/v1.0/tasks/<int:task_id>', methods = ['GET'])
@auth.login_required
def get_task(task_id):
    task = filter(lambda t: t['id'] == task_id, tasks)
    if len(task) == 0:
        abort(404)
    return jsonify( { 'task': make_public_task(task[0]) } )
 
@app.route('/todo/api/v1.0/tasks', methods = ['POST'])
@auth.login_required
def create_task():
    if not request.json or not 'titulo' in request.json:
        abort(400)
    task = {
    	'id': tasks[-1]['id'] + 1,
        'plazo': 1,
        'titulo': request.json['titulo'],
        'descripcion': request.json.get('descripcion', ""),
        'usuario': request.json['usuario'],
        'password': request.json['password'],
        'accesoDirecto': request.json['accesoDirecto'],
        'activo': False,
        'inactivo': True,
        'pausado': False
    }
    tasks.append(task)
    return jsonify( { 'task': make_public_task(task) } ), 201
 
@app.route('/todo/api/v1.0/tasks/<int:task_id>', methods = ['PUT'])
@auth.login_required
def update_task(task_id):
    task = filter(lambda t: t['id'] == task_id, tasks)
    if len(task) == 0:
        abort(404)
    if not request.json:
        abort(400)
    if 'titulo' in request.json and type(request.json['titulo']) != unicode:
        abort(400)
    if 'descripcion' in request.json and type(request.json['descripcion']) is not unicode:
        abort(400)
    if 'activo' in request.json and type(request.json['activo']) is not bool:
        abort(400)
    task[0]['plazo'] = request.json.get('plazo', task[0]['plazo'])
    task[0]['titulo'] = request.json.get('titulo', task[0]['titulo'])
    task[0]['descripcion'] = request.json.get('descripcion', task[0]['descripcion'])
    task[0]['usuario'] = request.json.get('usuario', task[0]['usuario'])
    task[0]['password'] = request.json.get('password', task[0]['password'])
    task[0]['accesoDirecto'] = request.json.get('accesoDirecto', task[0]['accesoDirecto'])
    task[0]['activo'] = request.json.get('activo', task[0]['activo'])
    task[0]['inactivo'] = request.json.get('inactivo', task[0]['inactivo'])
    task[0]['pausado'] = request.json.get('pausado', task[0]['pausado'])
    return jsonify( { 'task': make_public_task(task[0]) } )
    
@app.route('/todo/api/v1.0/tasks/<int:task_id>', methods = ['DELETE'])
@auth.login_required
def delete_task(task_id):
    task = filter(lambda t: t['id'] == task_id, tasks)
    if len(task) == 0:
        abort(404)
    tasks.remove(task[0])
    return jsonify( { 'result': True } )
    
if __name__ == '__main__':
    app.run(debug = True)