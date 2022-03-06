import { Link } from '@inertiajs/inertia-react';
import React from 'react';
import Chevron from '../Global/Chevron';

type Props = {
  albumPath: number;
  artistName: string;
  albumTitle: string;
  cover?: string;
  release: string;
};

const AlbumCard = ({
  albumPath,
  artistName,
  albumTitle,
  cover,
  release,
}: Props) => {
  return (
    <div>
      <Link href={`/album/${albumPath}`}>
        <div>
          <div>
            <p>{artistName}</p>
            <p>
              {albumTitle}
              <span>
                <Chevron />
              </span>
            </p>
          </div>
          <div>
            {cover ? (
              <img
                src={`/storage/${cover}`}
                alt={`Album cover for ${albumTitle}`}
                width="477px"
                height="477px"
              />
            ) : (
              <img
                src="/images/album-default.jpg"
                alt="No cover found for this album"
                width="477px"
                height="477px"
              />
            )}
          </div>
        </div>
        <div>{release}</div>
      </Link>
    </div>
  );
};

export default AlbumCard;
