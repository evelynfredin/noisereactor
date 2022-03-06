import React, { PropsWithChildren } from 'react';

type Props = {
  name: string;
  website: string;
  pic: string;
  bio: string;
};

const ArtistInfo = ({
  name,
  website,
  pic,
  bio,
  children,
}: PropsWithChildren<Props>) => {
  return (
    <>
      <h2 className="capitalize text-3xl font-bold mb-5 flex flex-col md:flex-row items-center">
        {name}
        <span className="font-normal text-xl md:ml-3">
          <a
            className="lowercase hover:text-blue-700 text-sm md:text-lg"
            href={website}
          >
            {website}
          </a>
        </span>
      </h2>
      <div className="flex flex-col lg:flex-row">
        <div className="w-full lg:w-3/5 h-auto">
          {pic ? (
            <img
              src={`/storage/${pic}`}
              alt={name}
              className="w-full h-full object-cover"
              width="756px"
              height="504px"
            />
          ) : (
            <img
              src="/images/artist-default.jpg"
              alt={name}
              className="w-full h-full object-cover"
              width="756px"
              height="504px"
            />
          )}
        </div>
        <div className="w-full mt-5 lg:mt-0 lg:w-2/5 lg:ml-5">
          <div className="bg-white rounded-lg p-5 text-lg shadow-sm">{bio}</div>
        </div>
      </div>
    </>
  );
};

export default ArtistInfo;
