import React, { PropsWithChildren } from 'react';

const Table = ({ children }: PropsWithChildren<unknown>) => {
  return <table className="w-full whitespace-nowrap">{children}</table>;
};

export default Table;
