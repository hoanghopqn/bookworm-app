import React from "react";
import { Route, Routes } from "react-router-dom";  
import Home from "./Home";  
import { About } from "./About";  
import { Shop } from "./Shop";  
import { Card } from "./Card";  
import HeaderComponent from "../components/header"; 
import FinalComponent from "../components/final";  

export default function App(){
  
  // const booka = JSON.parse(localStorage.getItem("book_id")); 
  // console.log(booka);
    return(
      <React.Fragment>
      <HeaderComponent/> 
      <div className="App" >
        <Routes> 
        <Route path="/"element={<Home/>} />  
        <Route path="/about" element={<About />} />   
        <Route path="/shop"element={<Shop />} />  
        <Route path="/shop/Card" element={<Card />} />  
        </Routes>
      </div>
      <FinalComponent/> 
    </React.Fragment>
    )
};
