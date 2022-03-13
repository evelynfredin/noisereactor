import React, { PropsWithChildren } from 'react';

const TableHead = ({ children }: PropsWithChildren<unknown>) => {
  return <thead>{children}</thead>;
};

export default TableHead;
