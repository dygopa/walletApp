import React from 'react';

const TransferList = ({transfers}) => (
    <table className="table">
        <tbody>
            {transfers.map((transfer, index) => (
                <tr key={index}>
                    <td>{transfer.description}</td>
                    <td
                        className={transfer.amount > 0 ? 'text-success' : 'text-danger'}
                    >
                    {transfer.amount}</td>
                </tr>
            ))}
        </tbody>
    </table>
)

export default TransferList 