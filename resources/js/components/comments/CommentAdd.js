import React from 'react';


function CommentAdd(props)
{
    const {handleCommentSubmit} = props;
    let comment="";
    return (

        <div>

            <div className="card mt-4 mb-3">
                <div className="card-header"><strong>Comments</strong></div>
                <div className="card-body">
                    <textarea name="comment" className="form-control" placeholder="Add a new comment" onChange={event => comment = event.target.value}>                   </textarea>
                </div>
            </div>
            <div>
                <button className="btn btn-primary mr-3" onClick={event =>handleCommentSubmit(comment)}>Comment</button>
                <button className="btn btn-warning" >Close issue</button>
            </div>
        </div>

    );
}


export default CommentAdd;
