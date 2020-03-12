import React, {Component} from 'react';
import ReactDOM from 'react-dom';


import CommentAdd from './CommentAdd';
import Comment from './Comment';


import axios from 'axios';

class CommentGroup extends Component{
    constructor(props){
        super(props);
        this.state={
            comments:[
                {id:1,body:'This is my first comment'},
                {id:2,body:'This is my second comment'},
                {id:3,body:'This is my third comment'}

            ]
        }
        this.handleCommentSubmit = this.handleCommentSubmit.bind(this);
    }
    handleCommentSubmit(data){
        // console.log('handleCommentSubmit',data);
        // // send function as prop to child

        // Functional and statelles component
        const postData={
            comment: data
        };
        axios.post('/api/comment/save', postData).then(response =>{
            // console.log('response', response.data);
            let comments = this.state.comments;
            comments.unshift({
                id:comments.length + 1,
                body: response.data.comment
            });
            this.setState({ comments: comments});

        });
    }
    renderComments(){

        const {comments} = this.state;

       return comments.map(comment =>{
            const {id , body} = comment;

            return (
                <Comment key={id} body={body}/>
            );
        })
    }
render(){
    return(
        <div>
            {this.renderComments()}
<CommentAdd handleCommentSubmit={this.handleCommentSubmit}/>
        </div>
        );
}

}


export default CommentGroup;


if(document.getElementById('comments-wrapper')){
    ReactDOM.render(<CommentGroup/>,document.getElementById('comments-wrapper'));
}
