import {ADD_TODO, DELETE_TODO} from '../actionTypes';


let todoId = 0
const initialState = {
    email: 'rock',
    todos:[]
}

export default function todoReducer(state = initialState, action) {
    switch(action.type) {
        case ADD_TODO: {
            return {
                ...state, 
                todos: [
                    ...state.todos,
                    {
                        id: todoId++,
                        name: action.payload.name
                    }
                ]
            }
        }
        case DELETE_TODO: {
            return {
                ...state, 
                todos: state.todos.filter(todo => 
                    todo.id != action.payload.id
                )
                 
            }
        }

        default : {
            return { 
                ...state
            }
        }
    }
}