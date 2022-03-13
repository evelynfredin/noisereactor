import React from 'react';

type Props = {
  label?: string;
  colSpan?: number;
};

const TableHeader = ({ label, colSpan }: Props) => {
  return (
    <th className="px-6 pt-5 pb-4" colSpan={colSpan}>
      {label}
    </th>
  );
};

export default TableHeader;
