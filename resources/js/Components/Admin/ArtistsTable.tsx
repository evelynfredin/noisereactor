import React, { PropsWithChildren } from 'react';
import Table from '../Table/Table';
import TableHead from '../Table/TableHead';
import TableHeader from '../Table/TableHeader';
import TableRow from '../Table/TableRow';

const ArtistsTable = ({ children }: PropsWithChildren<unknown>) => {
  return (
    <Table>
      <TableHead>
        <TableRow className="font-bold text-left">
          <TableHeader label="Artist" />
          <TableHeader label="Albums" />
          <TableHeader />
          <TableHeader colSpan={2} />
        </TableRow>
      </TableHead>
      <tbody>{children}</tbody>
    </Table>
  );
};

export default ArtistsTable;
