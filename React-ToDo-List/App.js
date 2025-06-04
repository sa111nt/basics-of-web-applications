import React, {Component} from "react"

import Header from "./Header"
import Filter from "./Filter"
import TodoList from "./TodoList"
import NewTask from "./NewTask"

class App extends Component {
    constructor() {
        super()
        this.state = {
            tasks: [
            { id: 1, text: "wash dishes", completed: false },
            { id: 2, text: "finish project", completed: false },
            { id: 3, text: "visit parents", completed: false }
        ],
            hideCompleted: false
}

        this.changeHideCompleted = this.changeHideCompleted.bind(this)
        this.toggleTask = this.toggleTask.bind(this)
        this.addNewTask = this.addNewTask.bind(this)

    }
    
    changeHideCompleted() {
        this.setState(prevState => {
            return {
                hideCompleted: !prevState.hideCompleted
            }
        })
    }
    
    toggleTask(id) {
        this.setState(prevState => {
            const updatedTasks = prevState.tasks.map(task =>
                task.id === id ? { ...task, completed: !task.completed } : task
            )
            return { tasks: updatedTasks }
        })
    }
    
    addNewTask(text) {
        this.setState(prevState => {
            const newTask = {
                id: Date.now(), 
                text: text,
                completed: false
            }
            return {
            tasks: [...prevState.tasks, newTask]
            }
        })
    }


   
    render() {
        return (
            <div className="app-container">
                <Header />
                <div className="todo-box">
                    <Filter 
                        hideCompleted={this.state.hideCompleted} 
                        changeHideCompleted={this.changeHideCompleted} />
                    <hr/>
                    <TodoList 
                        tasks={this.state.tasks}
                        hideCompleted={this.state.hideCompleted}
                        toggleTask={this.toggleTask} />
                    <hr/>
                    <NewTask addNewTask={this.addNewTask} />
             </div>
            </div>
        )
    }

}

export default App
