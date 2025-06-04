import React from "react"

class NewTask extends React.Component {
    constructor() {
        super()
        this.state = {
            input: ""
        }
        this.handleChange = this.handleChange.bind(this)
        this.handleSubmit = this.handleSubmit.bind(this)
    }

    handleChange(event) {
        this.setState({ input: event.target.value })
    }

    handleSubmit(event) {
        event.preventDefault()
        const text = this.state.input.trim()
        if (text !== "") {
            this.props.addNewTask(text)
            this.setState({ input: "" }) 
        }
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <input
                    type="text"
                    value={this.state.input}
                    onChange={this.handleChange}
                    placeholder="New task"
                />
                <button type="submit">Add</button>
            </form>
        )
    }
}

export default NewTask
