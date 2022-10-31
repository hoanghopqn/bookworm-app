import React from "react";
import { Route, Routes } from "react-router-dom";  
import { Home } from "./Home";  
import { About } from "./About";  
import HeaderComponent from "../components/header"; 
import FinalComponent from "../components/final"; 

export const App = () => {
    return(
      <React.Fragment>
      <HeaderComponent/> 
      <div className="App" >
        <Routes> 
        <Route path="/"element={<Home />} />  
        <Route path="/about" element={<About />} />  
        </Routes>
      </div>
      <FinalComponent/> 
    </React.Fragment>
    )
};
