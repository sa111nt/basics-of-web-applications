import React, {Component} from "react"

class Filter extends Component {
    render() {
        return (
            <label>
                <input
                    type="checkbox"
                    checked={this.props.hideCompleted}
                    onChange={this.props.changeHideCompleted}
                />
                hide completed
            </label>
        )
    }
}

export default Filter
