import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import CommentAdd from './CommentAdd';
import CommentList from './CommentList';
import axios from 'axios';

class CommentGroup extends Component{
    handleCommentSubmit(data){
        // console.log('handleCommentSubmit',data);
        // // send function as prop to child

        const postData={
            comment: data
        };
        axios.post('/api/comment/save', postData).then(response =>{
            console.log('response', response.data);

        });
    }
render(){
    return(
        <div>
<CommentList/>
<CommentAdd handleCommentSubmit={this.handleCommentSubmit}/>
        </div>
        );
}

}


export default CommentGroup;


if(document.getElementById('comments-wrapper')){
    ReactDOM.render(<CommentGroup/>,document.getElementById('comments-wrapper'));
}
