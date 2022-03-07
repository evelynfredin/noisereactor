import { Link } from '@inertiajs/inertia-react';
import React from 'react';
import Chevron from '../Global/Chevron';

type Props = {
  cover?: string;
  albumTitle: string;
  artistName: string;
  description: string;
  pathToArtist: string;
  edition: string;
  released: string;
  label: string;
};

const AlbumInfo = ({
  cover,
  albumTitle,
  artistName,
  description,
  pathToArtist,
  edition,
  released,
  label,
}: Props) => {
  return (
    <div className="mt-5 lg:max-w-5xl flex flex-col items-center lg:items-end lg:flex-row mx-auto">
      <div className="border rounded-lg w-80">
        {cover ? (
          <img
            src={`/storage/${cover}`}
            alt={`Album cover for ${albumTitle}`}
            width="477px"
            height="477px"
            className="rounded-lg shadow-lg"
          />
        ) : (
          <img
            src="/images/album-default.jpg"
            alt="No cover found for this album"
            width="477px"
            height="477px"
            className="rounded-lg shadow-lg"
          />
        )}
      </div>
      <div className="flex flex-col justify-end mx-auto w-full md:max-w-2xl lg:w-2/3 mt-10 lg:mt-0 lg:ml-7 bg-white rounded-lg shadow-sm">
        <div className="px-5 md:px-10 py-8">
          <Link href={`/artist/${pathToArtist}`}>
            <div className="flex space-x-3 items-center text-2xl md:text-4xl font-bold uppercase hover:text-blue-700 smoothify transform hover:translate-x-4">
              <h1>{artistName}</h1>
              <Chevron size="large" />
            </div>
          </Link>
          <h2 className="text-xl md:text-3xl font-bold uppercase text-blue-500">
            {albumTitle}
          </h2>
          <h3 className="text-sm text-gray-700 bg-blue-200 py-2 px-3 inline-block my-3 rounded-full">
            {edition}
          </h3>
          <p className="block border-t pt-3">{description}</p>
        </div>
        <div className="bg-gray-100 py-2 rounded-bl-lg rounded-br-lg px-5 md:px-10 flex flex-col items-center md:flex-row justify-between uppercase text-sm md:text-base">
          <p>
            <span className="font-bold">Released:</span> {released}
          </p>
          <p>
            <span className="font-bold">Label:</span> {label}
          </p>
        </div>
      </div>
    </div>
  );
};

export default AlbumInfo;
