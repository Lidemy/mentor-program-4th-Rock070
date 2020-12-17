import { ADD_USER } from '../actionTypes';

const userId = 0
const initialState = {
    users:[]
}

export default function userReducer(state = initialState, action) {
    switch(action.type) {
        case ADD_USER: {
            return {
                users:[
                    ...state.users,
                    {
                        id: userId++,
                        name: action.payload.name
                    }
                ]
            }
        }
        default : {
            return { 
                ...state
            }
        }
    }
}