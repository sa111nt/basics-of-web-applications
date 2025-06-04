import React from "react"

class Task extends React.Component {
    render() {
        const style = {
            textDecoration: this.props.completed ? 'line-through' : 'none',
            color: this.props.completed ? 'gray' : 'black'
        }
        return (
            <div>
                <label>
                    <input 
                        type="checkbox"
                        checked={this.props.completed}
                        onChange={this.props.onToggle}
                    />
                    <span style={style}>{this.props.text}</span>
                </label>
            </div>
        )
    }
}

export default Task
