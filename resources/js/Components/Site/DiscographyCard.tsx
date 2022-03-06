import { Link } from '@inertiajs/inertia-react';
import React from 'react';

type Props = {
  pathToAlbum: number;
  cover?: string;
  albumTitle: string;
};

const DiscographyCard = ({ pathToAlbum, cover, albumTitle }: Props) => {
  return (
    <div className="border rounded-lg bg-white hover:shadow-xl transform hover:-translate-y-1 smoothify">
      <Link href={`/album/${pathToAlbum}`}>
        {cover ? (
          <img
            src={`/storage/${cover}`}
            alt={`Album cover for ${albumTitle}`}
            className="object-cover object-center rounded-lg shadow-sm"
            width="286px"
            height="286px"
          />
        ) : (
          <img
            src="/images/album-default.jpg"
            alt="Default"
            className="object-cover object-center rounded-lg shadow-sm"
            width="286px"
            height="286px"
          />
        )}
      </Link>
    </div>
  );
};

export default DiscographyCard;
