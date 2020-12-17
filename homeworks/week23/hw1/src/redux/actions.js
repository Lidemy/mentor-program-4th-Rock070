import {ADD_TODO, DELETE_TODO, ADD_USER} from './actionTypes'

export function addTodo(name) {
    return({
        type: ADD_TODO,
        payload: {
            name
        }
    })
}

export function deleteTodo(id) {
    return({
        type: DELETE_TODO,
        payload: {
            id
        }
    })
}

export function addUser(name) {
    return({
        type: ADD_USER,
        payload: {
            name
        }
    })
}