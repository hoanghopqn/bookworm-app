import React from 'react'
import { Link } from 'react-router-dom';
import img from "../../assets/bookworm_icon.svg"

export const Final = () => {
  return (
    <div className="final">
            <div className="final-BW">
            <div className='final-header'>
            <img src={img} width="32" height="32" className="d-inline-block align-top my-auto" />
            <div className='final-text'>
                <div>BOOKWORM</div>
                <div>Address</div>
                <div>Phone</div>
            </div>
            </div>
            </div>
    </div>
  )
}
