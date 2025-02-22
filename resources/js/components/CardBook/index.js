import React from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import {
    Card,
    ListGroup,
    ListGroupItem,
    CardBody,
    CardTitle,
    CardText,
} from "reactstrap";
import "./style.scss";
import { useNavigate } from "react-router-dom";

export default function CardBook(props) {
    const { detailBook } = props;
    const {
        id,
        book_title,
        author_name,
        book_cover_photo,
        book_price,
        discount_price,
        final_price,
    } = detailBook;

    const urlImg = `images/${
        book_cover_photo ? book_cover_photo : "default-image"
    }.jpg`;
    let navigate = useNavigate();

    const handleGetDetail = (bookId) => {
        localStorage.setItem("book_id", JSON.stringify(bookId));
        let path = `/shop/Card`;
        navigate(path);
    }; 
    const styleprice = discount_price ? 'style-price'  : 'discount';  
    const stylediscount = discount_price ? 'discount' : 'discount_price' ;
    return (
        <Card className="SingleCard" onClick={() => handleGetDetail(id)} key={id}>
            <img alt="Card" src={urlImg} />
            <CardBody>
                <CardTitle className="card-title">{book_title}</CardTitle>
                <CardText className="card-text">{author_name}</CardText>
            </CardBody>
            <ListGroup flush>
                <ListGroupItem className="price">
                    <a className={styleprice}>{"$" + book_price}</a> 
                    <a className={stylediscount}>{"$" + discount_price}</a> 
                </ListGroupItem>
            </ListGroup>
        </Card>
    );
}
