import React, { useEffect, useState } from "react";
import BannerComponent from "../components/home/banner";
import FeatureComponent from "../components/home/feature";
import * as bookServices from "../apiServices/bookServices";
export default function Home(props){
  const [ saleBooks, setSaleBooks ] = useState([]);
    useEffect(() => {
        const getSaleBooks = async () => {
            const result = await bookServices.getListBooks("get-book-sale?limit=8");
            setSaleBooks(result.book);
        };
        getSaleBooks();
    }, []);  

    return (
        <>

            <BannerComponent saleBooks={saleBooks} />
            <FeatureComponent />
        </>
    );
};
