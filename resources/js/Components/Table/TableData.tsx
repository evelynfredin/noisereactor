import React, { PropsWithChildren } from 'react';

const TableData = ({ children }: PropsWithChildren<unknown>) => {
  return <td className="px-6 py-4 text-gray-500">{children}</td>;
};

export default TableData;
