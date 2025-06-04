import React from "react"
import Task from "./Task"

class TodoList extends React.Component {
    render() {

        const filteredTasks = this.props.hideCompleted
            ? this.props.tasks.filter(task => !task.completed)
            : this.props.tasks

        if (filteredTasks.length === 0) {
            return <div>nothing to do..</div>
        }

        return (
            <div>
                {filteredTasks.map(task => (
                    <Task
                        key={task.id}
                        text={task.text}
                        completed={task.completed}
                        onToggle={() => this.props.toggleTask(task.id)}
                    />
                ))}
            </div>
        )
    }
}

export default TodoList
