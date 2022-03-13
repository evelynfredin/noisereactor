import Edit from '@/Components/Global/Edit';
import { Pagination } from '@/Components/Global/Pagination';
import Table from '@/Components/Table/Table';
import TableData from '@/Components/Table/TableData';
import TableHead from '@/Components/Table/TableHead';
import TableHeader from '@/Components/Table/TableHeader';
import TableRow from '@/Components/Table/TableRow';
import Admin from '@/Layouts/Admin';
import React from 'react';

type Props = {
  artists: Laravel.Pagination<App.Artist>;
};

const ArtistList = ({ artists }: Props) => {
  console.log(artists);

  return (
    <Admin title="Artists">
      <div></div>
      <section className="overflow-x-auto bg-white rounded shadow">
        <Table>
          <TableHead>
            <TableRow className="font-bold text-left">
              <TableHeader label="Artist" />
              <TableHeader label="Total Albums" />
              <TableHeader />
            </TableRow>
          </TableHead>
          <tbody>
            {artists.data.map((artist) => (
              <TableRow
                key={artist.id}
                className="hover:bg-gray-100 focus-within:bg-gray-100"
              >
                <TableData>
                  <div
                    className="flex items-center gap-x-2"
                    title="Edit artist info"
                  >
                    {artist.name}
                    <Edit size="small" />
                  </div>
                </TableData>
                <TableData>{artist.albums_count}</TableData>
                <TableData>Delete</TableData>
              </TableRow>
            ))}
          </tbody>
        </Table>
      </section>
      <div className="my-20">
        <Pagination data={artists} />
      </div>
    </Admin>
  );
};

export default ArtistList;
