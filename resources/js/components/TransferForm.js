import React from 'react'

const TransferForm = ({form, onChange, onSubmit}) => (
    <form onSubmit={onSubmit} className="form-inline justify-content-center">
        <div className="form-group mb-2">
            <input type="text" name="description" className="form-control" placeholder="Description" value={form.description} onChange={onChange}/>
        </div>
        <div className="input-group mx-sm-2 mb-2">
            <div className="input-group-prepend">
                <div className="input-group-text">$</div>
            </div>
            <input type="text" name="amount" className="form-control" value={form.amount} onChange={onChange}/>
        </div>
        <button type="submit" className="btn btn-primary mb-2">Add</button>
    </form>
)

export default TransferForm