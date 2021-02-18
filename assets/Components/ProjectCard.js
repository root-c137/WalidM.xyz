import React, {Fragment} from 'react';

import Issou from '../Images/issou.png';

const ProjectCard = ({Project}) =>
{
    const Img = require('../Images/meilleureseriefrancaise.png').default;

    return (
    <Fragment>

            <div className="ProjectCard">
                <img className="Img" src={Img}/>
                <a className="Title" href={Project.Link}>{Project.Title}</a>
                <a className="Infos" href={Project.ApiLink}>plus d'infos</a>
            </div>

        </Fragment>
    )
}

export default ProjectCard;
