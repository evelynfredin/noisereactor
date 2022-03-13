import React, { PropsWithChildren } from 'react';

const TableHead = ({ children }: PropsWithChildren<unknown>) => {
  return (
    <thead className="uppercase border-b  font-headings">{children}</thead>
  );
};

export default TableHead;
