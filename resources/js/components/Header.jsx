import React from 'react'
import { Navbar, Nav } from 'react-bootstrap';
import { Link } from 'react-router-dom';
import img from "../../assets/bookworm_icon.svg"

export const Header = () => {
  return (
    <header className="my-0">
            <Navbar collapseOnSelect expand="md" bg="light">
                <Navbar.Brand href="/">
                    <img src={img} width="32" height="32" className="d-inline-block align-top my-auto" />
                    <b className="ml-2"> BOOKWORM</b>
                </Navbar.Brand> 
                <Navbar.Collapse id="responsive-navbar-nav">
                    <Nav className="ml-auto">
                        <Nav.Link>
                           <a >Home</a> 
                        </Nav.Link>
                        <Nav.Link>
                        <a >Shop</a>  
                        </Nav.Link>
                        <Nav.Link >
                        <a >About</a> 
                        </Nav.Link>
                        <Nav.Link>
                        <a >Cart</a> 
                        </Nav.Link>
                        <Nav.Link>
                        <a >Login</a> 
                        </Nav.Link>
                    </Nav>
                </Navbar.Collapse>
            </Navbar>
        </header>
  )
}
