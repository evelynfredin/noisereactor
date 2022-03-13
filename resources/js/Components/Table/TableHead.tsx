import React, { PropsWithChildren } from 'react';

const TableHead = ({ children }: PropsWithChildren<unknown>) => {
  return <thead className="bg-slate-800 text-gray-50">{children}</thead>;
};

export default TableHead;
