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
  albums: Laravel.Pagination<App.Album>;
};

const AlbumList = ({ albums }: Props) => {
  console.log(albums);

  return (
    <Admin title="Albums">
      <section className="overflow-x-auto rounded shadow">
        <Table>
          <tbody>
            {albums.data.map((album) => (
              <TableRow
                key={album.id}
                className="hover:bg-blue-50 focus-within:bg-gray-100 odd:bg-white even:bg-slate-50"
              >
                <TableData>
                  <div
                    className="flex items-center gap-x-2"
                    title="Edit album info"
                  >
                    {album.cover !== null ? (
                      <img
                        src={`/storage/${album.cover}`}
                        alt={`Album cover for ${album.title}`}
                        className="w-[40px] rounded-md mr-2"
                      />
                    ) : (
                      <img
                        src="/images/album-default.jpg"
                        alt="Default"
                        className="w-[40px] rounded-md mr-2"
                      />
                    )}
                    {album.title}
                    <Edit size="small" />
                  </div>
                </TableData>

                <TableData>Add review</TableData>
                <TableData>Delete</TableData>
              </TableRow>
            ))}
          </tbody>
        </Table>
      </section>
      <div className="my-20">
        <Pagination data={albums} />
      </div>
    </Admin>
  );
};

export default AlbumList;
