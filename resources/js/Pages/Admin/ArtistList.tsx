import { LinkButton } from '@/Components/Global/Button';
import Chevron from '@/Components/Global/Chevron';
import Edit from '@/Components/Global/Edit';
import { Pagination } from '@/Components/Global/Pagination';
import Plus from '@/Components/Global/Plus';
import Admin from '@/Layouts/Admin';
import React from 'react';

type Props = {
  artists: Laravel.Pagination<App.Artist>;
};

const ArtistList = ({ artists }: Props) => {
  console.log(artists);

  return (
    <Admin title="Artists">
      <div className="mt-10 flex justify-between items-center">
        <div>Search placeholder</div>
        <LinkButton create href={route('artist.create')}>
          <Plus size="normal" />
          Add artist
        </LinkButton>
      </div>

      <section className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 py-10">
        {artists &&
          artists.data.map((artist) => (
            <div
              className="bg-white border rounded-md shadow-sm pt-3 hover:shadow-lg h-full flex flex-col justify-between"
              key={artist.id}
            >
              <div className="flex items-start justify-between px-5 pb-3 group">
                <h3 className="text-lg font-bold text-left group-hover:text-blue-500">
                  {artist.name}
                  <span className="block uppercase text-gray-500 text-sm">
                    {artist.albums_count === 1 ? (
                      <>{artist.albums_count} album</>
                    ) : (
                      <>{artist.albums_count} albums</>
                    )}
                  </span>
                </h3>
                {artist.pic !== null ? (
                  <img
                    src={`/storage/${artist.pic}`}
                    alt={`Album cover for ${artist.name}`}
                    className="w-auto h-[40px] object-cover rounded-md pt-[4px]"
                  />
                ) : (
                  <img
                    src="/images/artist-default.jpg"
                    alt="Default"
                    className="w-auto h-[40px] object-cover rounded-md pt-[4px]"
                  />
                )}
              </div>
              <div className="flex border-t rounded-b-md">
                <div className="w-1/2">
                  <LinkButton
                    noButton
                    small
                    className="w-full py-3 flex justify-center items-center hover:text-white hover:bg-blue-600 rounded-bl-md"
                    title="Edit artist"
                    href={route('artist.edit', [artist.slug])}
                  >
                    <Edit size="small" /> Edit
                  </LinkButton>
                </div>
                <div className="border-l w-1/2">
                  <LinkButton
                    noButton
                    small
                    className="w-full py-3 flex justify-center items-center hover:text-white hover:bg-blue-600 rounded-br-md"
                    title="View artist's page"
                    href={route('show.artist', [artist.slug])}
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
        <Pagination data={artists} />
      </div>
    </Admin>
  );
};

export default ArtistList;
