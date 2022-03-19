import { LinkButton } from '@/Components/Global/Button';
import Chevron from '@/Components/Global/Chevron';
import Edit from '@/Components/Global/Edit';
import { Pagination } from '@/Components/Global/Pagination';
import Plus from '@/Components/Global/Plus';
import Admin from '@/Layouts/Admin';
import { Link } from '@inertiajs/inertia-react';
import React, { useState } from 'react';

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
            <Link
              title="Edit artist info"
              href={route('artist.edit', [artist.slug])}
              key={artist.id}
            >
              <div className="hover:bg-white border rounded shadow-sm px-5 py-3 hover:shadow-lg group h-full flex flex-col justify-between">
                <div>
                  <div className="flex justify-between items-start">
                    <h3 className="text-lg flex md:text-xl font-bold text-left group-hover:text-blue-500">
                      {artist.name}
                    </h3>
                    <div className="w-[20px] text-gray-200">
                      <Edit size="normal" />
                    </div>
                  </div>
                  {artist.albums_count === 1 ? (
                    <p className="text-left">{artist.albums_count} album</p>
                  ) : (
                    <p className="text-left">{artist.albums_count} albums</p>
                  )}
                </div>

                <div className="flex justify-end">
                  <LinkButton
                    noButton
                    small
                    title="View artist page"
                    href={route('show.artist', [artist.slug])}
                  >
                    View artist page
                    <Chevron size="small" />
                  </LinkButton>
                </div>
              </div>
            </Link>
          ))}
      </section>
      <div className="my-20">
        <Pagination data={artists} />
      </div>
    </Admin>
  );
};

export default ArtistList;
