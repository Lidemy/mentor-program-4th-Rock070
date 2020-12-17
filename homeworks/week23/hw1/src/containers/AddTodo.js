import { connect } from 'react-redux'
import { addTodo, deleteTodo } from '../redux/actions'
import AddTodo from '../component/AddTodo'

const mapStateToProps = (store) => {
   return {
        todos: store.todoState.todos,
    } 
}
  
const mapDispatchToProps = {
    addTodo,
}


export default connect(mapStateToProps, mapDispatchToProps)(AddTodo)