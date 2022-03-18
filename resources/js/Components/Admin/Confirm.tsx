import React, { PropsWithChildren } from 'react';
import { Button } from '../Global/Button';
import Close from '../Global/Close';

type Props = {
  showDialog: React.MouseEventHandler<HTMLButtonElement>;
};

const Confirm = ({ showDialog, children }: PropsWithChildren<Props>) => {
  return (
    <div className="w-screen h-screen flex justify-center items-center z-0 absolute bg-black bg-opacity-70 overflow-hidden">
      <div className="w-[320px] h-[300px] bg-white shadow-lg rounded-lg p-5">
        <div className="flex justify-between items-center">
          <h2 className="uppercase text-xl">Are you sure?</h2>
          <button
            onClick={showDialog}
            title="Close"
            className="text-gray-400 hover:text-gray-700 rounded-full border border-transparent w-[40px] h-[40px] flex justify-center items-center hover:border-blue-700"
          >
            <Close size="small" />
          </button>
        </div>
        <p className="mt-3 border-t-2 pt-5">
          Some things we just can't undo. This is one of them.
        </p>
        <div className="flex flex-col space-y-3 mt-5">
          {children}
          <Button onClick={showDialog}>Cancel</Button>
        </div>
      </div>
    </div>
  );
};

export default Confirm;
