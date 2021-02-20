import React, {Fragment} from 'react';

const ProjectCard = ({Project}) =>
{
    let Img;
    if(Project.Category === "Site")
        Img = require(`../../public/Imgs/Sites/${Project.Image}`);
    if(Project.Category === "Appli")
        Img = require(`../../public/Imgs/Applis/${Project.Image}`);

    return (
    <Fragment>

            <div className="ProjectCard">
                <img className="Img" src={Img}  alt="..." />
                <a className="Title" href={Project.Link}>{Project.Title}</a>
                <a className="Infos" href={Project.ApiLink}>plus d'infos</a>
            </div>

        </Fragment>
    )
}
export default ProjectCard;
