import React, { PropsWithChildren } from 'react';

type Props = {
  className?: string;
};

const TableRow = ({ className, children }: PropsWithChildren<Props>) => {
  return <tr className={className}>{children}</tr>;
};

export default TableRow;
