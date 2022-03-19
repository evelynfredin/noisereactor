import { LinkButton } from '@/Components/Global/Button';
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
  const [confirm, setConfirm] = useState<boolean>(false);

  return (
    <Admin title="Artists">
      <div className="my-10 flex justify-between items-center">
        <div>Search placeholder</div>
        <LinkButton create href={route('artist.create')}>
          <Plus size="small" />
          Add artist
        </LinkButton>
      </div>

      <section className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 py-10">
        {artists &&
          artists.data.map((artist) => (
            <Link
              title="Edit artist info"
              href={route('artist.edit', [artist.slug])}
              as="button"
              key={artist.id}
            >
              <div className="hover:bg-white border rounded shadow-sm p-5 hover:shadow-lg">
                <div className="flex justify-between items-center">
                  <h3 className="text-lg flex md:text-xl font-bold text-sky-600 text-left">
                    {artist.name}
                  </h3>
                  <Edit size="normal" />
                </div>
                {artist.albums_count === 1 ? (
                  <p className="text-left">{artist.albums_count} album</p>
                ) : (
                  <p className="text-left">{artist.albums_count} albums</p>
                )}
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
