import { combineReducers } from 'redux';
import todoReducer from './todos'
import userReducer from './users'

export default combineReducers({
    todoState: todoReducer,
    userState: userReducer,
});