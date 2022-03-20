import { LinkButton } from '@/Components/Global/Button';
import Chevron from '@/Components/Global/Chevron';
import Edit from '@/Components/Global/Edit';
import { Pagination } from '@/Components/Global/Pagination';
import Plus from '@/Components/Global/Plus';
import Admin from '@/Layouts/Admin';
import { Link } from '@inertiajs/inertia-react';
import React from 'react';

type Props = {
  albums: Laravel.Pagination<App.Album>;
};

const AlbumList = ({ albums }: Props) => {
  return (
    <Admin title="Albums">
      <div className="mt-10 flex justify-between items-center">
        <div>Search placeholder</div>
        <LinkButton create href={route('album.create')}>
          <Plus size="normal" />
          Add album
        </LinkButton>
      </div>
      <section className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 py-10">
        {albums.data.map((album) => (
          <div
            className="bg-white border rounded-md shadow-sm pt-3 hover:shadow-lg h-full flex flex-col justify-between"
            key={album.id}
          >
            <Link
              title="Edit album info"
              href={route('album.edit', [album.id])}
            >
              <div className="flex items-start justify-between px-5 pb-3 group">
                <h3 className="text-lg font-bold text-left group-hover:text-blue-500">
                  {album.title}
                  <span className="block uppercase text-gray-500 text-sm">
                    {album.artist.name}
                  </span>
                </h3>
                {album.cover !== null ? (
                  <img
                    src={`/storage/${album.cover}`}
                    alt={`Album cover for ${album.title}`}
                    className="w-[40px] rounded-md pt-[4px]"
                  />
                ) : (
                  <img
                    src="/images/album-default.jpg"
                    alt="Default"
                    className="w-[40px] rounded-md pt-[4px]"
                  />
                )}
              </div>
            </Link>
            <div className="flex border-t rounded-b-md">
              <div className="w-1/2">
                <LinkButton
                  noButton
                  small
                  className="w-full py-3 flex justify-center items-center hover:text-white hover:bg-blue-600 rounded-bl-md"
                  title={album.review ? 'Edit review' : 'Add review'}
                  href={route('review.create', [album.id])}
                >
                  {album.review ? (
                    <>
                      <Edit size="small" /> Review
                    </>
                  ) : (
                    <>
                      <Plus size="small" /> Review
                    </>
                  )}
                </LinkButton>
              </div>
              <div className="border-l w-1/2">
                <LinkButton
                  noButton
                  small
                  className="w-full py-3 flex justify-center items-center hover:text-white hover:bg-blue-600 rounded-br-md"
                  title="View album's page"
                  href={route('show.album', [album.id])}
                >
                  View
                  <Chevron size="normal" />
                </LinkButton>
              </div>
            </div>
          </div>
        ))}
      </section>
      <div className="my-20">
        <Pagination data={albums} />
      </div>
    </Admin>
  );
};

export default AlbumList;
