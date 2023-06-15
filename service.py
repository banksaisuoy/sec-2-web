from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

items = []

@app.route('/')
def index():
    return render_template('service.html', items=items)

@app.route('/add', methods=['POST'])
def add_item():
    item = request.form['item']
    items.append(item)
    return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)
