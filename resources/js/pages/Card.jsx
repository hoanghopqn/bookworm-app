import React, { useEffect, useState } from "react";
import FindCard from "../components/Card/index";
import FindReview from "../components/Review/index";
import * as bookServices from "../apiServices/bookServices";
import * as reviewServices from "../apiServices/reviewServices";

export const Card = () => {
    const [cardb, setCard] = useState([]);
    const [review, setReview] = useState([]);
    const bookId = JSON.parse(localStorage.getItem("book_id"));
    useEffect(() => {
        const getcard = async () => {
            const result = await bookServices.getListBooks(
                `get-book/${bookId}`
            );
            setCard(result.book);
        };
        getcard();
        const getreview = async () => {
            const result = await reviewServices.getListReview(
                `get-review/${bookId}`
            );
            setReview(result.review);
        };
        getreview();
    }, []);
    return (
        <>
            <FindCard cardb={cardb} />
            <FindReview cardb={cardb} review={review}/>
        </>
    );
};
