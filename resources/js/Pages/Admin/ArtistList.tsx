import { LinkButton } from '@/Components/Global/Button';
import Edit from '@/Components/Global/Edit';
import { Pagination } from '@/Components/Global/Pagination';
import Plus from '@/Components/Global/Plus';
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
  return (
    <Admin title="Artists">
      <div className="mb-10 flex justify-between items-center">
        <div>Search placeholder</div>

        <LinkButton create href={route('artist.create')}>
          <Plus size="small" />
          Add artist
        </LinkButton>
      </div>
      <section className="overflow-x-auto rounded shadow">
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
                className="hover:bg-blue-50 focus-within:bg-gray-100 odd:bg-white even:bg-slate-50"
              >
                <TableData>
                  <LinkButton
                    title="Edit artist info"
                    href={route('artist.edit', [artist.slug])}
                    as="button"
                    noButton
                  >
                    {artist.name}
                    <Edit size="small" />
                  </LinkButton>
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
