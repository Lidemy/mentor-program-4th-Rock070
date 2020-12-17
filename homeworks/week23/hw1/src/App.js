import React from 'react';
import logo from './logo.svg';
import { createStore } from 'redux';
import { Counter } from './features/counter/Counter';
import { useSelector, useDispatch }  from 'react-redux';
import './App.css';
import styled from 'styled-components';

import AddTodo from './containers/AddTodo'
import { selectTodos } from './redux/selectors'
import { deleteTodo } from './redux/actions'

function App() {
  const todos = useSelector(selectTodos) 
  console.log(todos)
  const dispatch = useDispatch()
  const Root = styled.div`
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%)
  `

  return (
   <Root>
     <AddTodo />
     <ul>
      {todos.map(todo => (
        <li>
          {todo.name}
          <button onClick={ () => {dispatch(deleteTodo(todo.id))}}>刪除</button>  
        </li>
        
      ))}
      
     </ul>

   </Root>
  );
}

export default App;
