import { useState, Fragment } from 'react';

export default function AddTodo({ todos, addTodo }) {
    const [value, setValue] = useState('')

    return ( 
        <Fragment>
            <input onChange={e => {setValue(e.target.value)}} />
            <button onClick={() => {
                addTodo(value)
                setValue('')
            }}>
                add todo
            </button>
            
        </Fragment>
    )
}