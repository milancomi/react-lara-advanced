import React, { Component } from 'react';

class Comment extends Component {
  constructor(props) {
    super(props);
  }
  render() {
    const { body, created_at } = this.props.comment;
    const { name } = this.props.comment.creator;
    return (
      <div className="comment card mb-2">
        <div className="card-body">
          <strong>{name}</strong> {created_at} <br />{body}
        </div>
      </div>
    );
  }
}

export default Comment;
